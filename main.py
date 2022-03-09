from flask import Flask, render_template
from flask_mail import Mail,Message
import os
from googleapiclient.discovery import build
from google_auth_oauthlib.flow import InstalledAppFlow
from google.auth.transport.requests import Request
import pickle
import os.path
import base64
import email
from bs4 import BeautifulSoup
import imaplib
from email.header import decode_header
from flask import Flask, redirect, url_for, request

app = Flask(__name__) 
# Define the SCOPES. If modifying it, delete the token.pickle file.
SCOPES = ['https://www.googleapis.com/auth/gmail.readonly']


import imaplib
import email
from email.header import decode_header
import webbrowser
import os

# account credentials
username = "rajendra.indybytes@gmail.com"
password = "indybytes@123"

@app.route('/index',methods = ['POST', 'GET'])

def getemails():
    if request.method == 'GET':
        all_data=[]
        subjects=[]
        Froms=[]
        Dates=[]
        def clean(text):
        #     clean text for creating a folder
            return "".join(c if c.isalnum() else "_" for c in text)
        # create an IMAP4 class with SSL 
        imap = imaplib.IMAP4_SSL("imap.gmail.com")
        # authenticate
        imap.login(username, password)
        status, messages = imap.select("INBOX")
        # number of top emails to fetch
        N = 100000000000
        # total number of emails
        messages = int(messages[0])



        for i in range(messages, messages-N, -1):
            # fetch the email message by ID\
            try:
                res, msg = imap.fetch(str(i), "(RFC822)")
                for response in msg:
                    if isinstance(response, tuple):
                        # parse a bytes email into a message object
                        msg = email.message_from_bytes(response[1])
                        # decode the email subject
                        subject, encoding = decode_header(msg["Subject"])[0]
                        if isinstance(subject, bytes):
                            # if it's a bytes, decode to str
                            subject = subject.decode(encoding="utf-8")
                        Date, encoding = decode_header(msg["Date"])[0]
                        if isinstance(subject, bytes):
                            # if it's a bytes, decode to str
                            Date = Date.decode(encoding="utf-8")
                        # decode email sender
                        From, encoding = decode_header(msg.get("From"))[0]
                        if isinstance(From, bytes):
                            From = From.decode(encoding)
                        Subject=subject
                        subjects.append(Subject)
                        print("Subject:$$$$$$$$$$$$$$$$$", subject)
                        From=From
                        Froms.append(From)
                        print("From:&&&&&&&&&&&&&&&&&&&", From)
                        Date=Date
                        Dates.append(Date)
                        print("date:###################",Date)
                        # if the email message is multipart
                        if msg.is_multipart():
                            # iterate over email parts
                            for part in msg.walk():
                                # extract content type of email
                                content_type = part.get_content_type()
                                content_disposition = str(part.get("Content-Disposition"))
                                try:
                                    # get the email body
                                    body = part.get_payload(decode=True).decode()
                                except:
                                    pass
                                if content_type == "text/plain" and "attachment" not in content_disposition:
                                    # print text/plain emails and skip attachments
                                    Message=body
                                    print("Message:@@@@@@@@@@@@@@@@@@@@@@@@@@",body)
                                    all_data.append(Message)
            #                     elif "attachment" in content_disposition:
            #                         # download attachment
            #                         filename = part.get_filename()
            #                         if filename:
            #                             folder_name = clean(subject)
            #                             if not os.path.isdir(folder_name):
            #                                 # make a folder for this email (named after the subject)
            #                                 os.mkdir(folder_name)
            #                             filepath = os.path.join(folder_name, filename)
            #                             # download attachment and save it
            #                             open(filepath, "wb").write(part.get_payload(decode=True))
                        else:
                            # extract content type of email
                            content_type = msg.get_content_type()
                            # get the email body
                            body = msg.get_payload(decode=True).decode()
                            if content_type == "text/plain":
                                # print only text email parts
                                print(body)
            #             if content_type == "text/html":
            #                 # if it's HTML, create a new HTML file and open it in browser
            #                 folder_name = clean(subject)
            #                 if not os.path.isdir(folder_name):
            #                     # make a folder for this email (named after the subject)
            #                     os.mkdir(folder_name)
            #                 filename = "index.txt"
            #                 filepath = os.path.join(folder_name, filename)
            #                 # write the file
            #                 open(filepath, "w",encoding="utf-8").write(body)
                            # open in the default browser
            #                 webbrowser.open(filepath)
                        print("="*100)
            except:
                break
        # close the connection and logout
        imap.close()
        imap.logout()
        return render_template("index.html",Subject=subjects, Formm=Froms,date=Dates,all_datas = all_data)

app.run(debug=True)
    





