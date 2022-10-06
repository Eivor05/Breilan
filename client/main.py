import mysql.connector as mc
import os
from time import sleep
from playsound import playsound
from rich.live import Live
from rich.table import Table
from rich.console import Console

os.system("clear");

console = Console()

table = Table(show_lines=True)
table.add_column("Who")
table.add_column("Where")
table.add_column("Why")


host = "db.pergynt.xyz"
database = "support"
user = "techsupport"
password = "goin"


#with Live(table, refresh_per_second=4):
prevElement = None
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
        if record != []:
            if prevElement == None:
                for i in record:
                    table.add_row(i[1], f"[bold]{i[2]}", i[3])
                prevElement = record[-1]
                console.print(table)
                continue
            if prevElement != record[-1]:
                table.add_row(record[-1][1], f"[bold]{record[-1][2]}", record[-1][3])
                prevElement = record[-1]
                os.system("clear")
                console.print(table)
                playsound("assets/notify.wav")
        else:
            console.print(table)
    else:
        break
    connection.close()
    sleep(1)

connection.close()

