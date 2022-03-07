from flask import Flask, render_template
from flask_mail import Mail,Message
import os
app = Flask(__name__)

password='indybytes@123'
user = 'rajendra.indybytes@gmail.com'


# app.config.update(
# 	DEBUG=True,
# 	#EMAIL SETTINGS
# 	MAIL_SERVER='smtp.gmail.com',
# 	MAIL_PORT=465,
# 	MAIL_USE_SSL=True,
# 	MAIL_USERNAME = 'rajendra.indybytes@gmail.com',
# 	MAIL_PASSWORD = 'indybytes@123'
# 	)
# mail = Mail(app)

# @app.route('/')
# def send_mail():
# 	try:
# 		msg = Message("Send Mail Tutorial!",
# 		  sender='rajendra.indybytes@gmail.com',
# 		  recipients=["amit1.indybytes@gmail.com"])
# 		msg.body = "Yo!\nHave you heard the good word of Python???"           
# 		mail.send(msg)
# 		return 'Mail sent!'
# 	except Exception(e):
# 		return(str(e)) 


@app.route('/')
def send_mail():
    return render_template('index.html')




app.run(debug=True)