from flask import Flask, render_template
from flask_mail import Mail,Message
import os


# password='indybytes@123'
# user = 'rajendra.indybytes@gmail.com'



# Importing libraries
# import imaplib, email
 
# user = 'rajendra.indybytes@gmail.com'
# password = 'indybytes@123'
# imap_url = 'imap.gmail.com'
 
# Function to get email content part i.e its body part

from googleapiclient.discovery import build
from google_auth_oauthlib.flow import InstalledAppFlow
from google.auth.transport.requests import Request
import pickle
import os.path
import base64
import email
from bs4 import BeautifulSoup
app = Flask(__name__) 
# Define the SCOPES. If modifying it, delete the token.pickle file.
SCOPES = ['https://www.googleapis.com/auth/gmail.readonly']

@app.route('/index.html')
def getEmails():
    
    creds = None
  
    # The file token.pickle contains the user access token.
    # Check if it exists
    if os.path.exists('token.pickle'):
  
        # Read the token from the file and store it in the variable creds
        with open('token.pickle', 'rb') as token:
            creds = pickle.load(token)
  
    # If credentials are not available or are invalid, ask the user to log in.
    if not creds or not creds.valid:
        if creds and creds.expired and creds.refresh_token:
            creds.refresh(Request())
        else:
            flow = InstalledAppFlow.from_client_secrets_file('credentials.json', SCOPES)
            
            creds = flow.run_local_server(port=0)
  
        # Save the access token in token.pickle file for the next run
        with open('token.pickle', 'wb') as token:
            pickle.dump(creds, token)
  
    # Connect to the Gmail API
    service = build('gmail', 'v1', credentials=creds)
  
    # request a list of all the messages
    result = service.users().messages().list(userId='me').execute()
  
    # We can also pass maxResults to get any number of emails. Like this:
    # result = service.users().messages().list(maxResults=200, userId='me').execute()
    messages = result.get('messages')
  
    # messages is a list of dictionaries where each dictionary contains a message id.
  
    # iterate through all the messages

    for msg in messages:

        # Get the message from its id
        txt = service.users().messages().get(userId='me', id=msg['id']).execute()
  
        # Use try-except to avoid any Errors
        try:
            # Get value of 'payload' from dictionary 'txt'
            payload = txt['payload']
            headers = payload['headers']
  
            # Look for Subject and Sender Email in the headers
            for d in headers:
                if d['name'] == 'Subject':
                    subject = d['value']
                if d['name'] == 'From':
                    sender = d['value']
  
            # The Body of the message is in Encrypted format. So, we have to decode it.
            # Get the data and decode it with base 64 decoder.
            parts = payload.get('parts')[0]
            data = parts['body']['data']
            data = data.replace("-","+").replace("_","/")
            decoded_data = base64.b64decode(data)
            # Now, the data obtained is in lxml. So, we will parse 
            # it with BeautifulSoup library
            soup = BeautifulSoup(decoded_data , "lxml")
            body = soup.body()
#             print(soup)
            # Printing the subject, sender's email and message
            Subject= subject
            print("Subject=========",Subject)
            From= sender.replace(' <',' ').replace('>',' ')
            print("From:**********",From)
            Message=str(body).replace('[<p>',' ').replace('</p>]',' ')
            print("Message:&&&&&&&&&&&&&",Message)
            Date=Date
            print("Date:--------------",Date)
            print('\n')
            # return render_template('index.html',Subjects=Subject,Froms=From,Messages=Message)       
        except:
            pass
        return render_template('index.html',Subjects=Subject,Froms=From,Messages=Message)
getEmails()
         
# user="puneet"
# @app.route('/index.html')
# def send_mail():
#     return render_template('index.html',username=user)




app.run(debug=True)