import mysql.connector as mc
import os
from time import sleep
from playsound import playsound

os.system("clear");

host = "localhost"
database = "support"
user = "techsupport"
password = "goin"


prevRecord = None
while True:

    connection = mc.connect(host=host, database=database, user=user, password=password)
    if connection.is_connected():
        cursor = connection.cursor()

        #sql = "INSERT INTO tasks (pname, room ,pdesc) VALUES (%s, %s, %s)"
        #val = ("TEST name", "TEST room", "TEST description")
        #
        #cursor.execute(sql, val)
        #connection.commit()

        cursor.execute("SELECT * FROM tasks")
        record = cursor.fetchall()

        if(record != prevRecord):
            os.system("clear")
            for x in record:
                print(f"'{x[1]}' needs help in '{x[2]} with '{x[3]}'")
            playsound("assets/notify.wav")
            prevRecord = record
    else:
        break
    connection.close()
    sleep(1)

connection.close()

