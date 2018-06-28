#-*- coding:utf-8 -*-
import sqlite3
import os

conn = sqlite3.connect("../store/store.db")

storename = input()
cur = conn.cursor()
#sql = "select id from "
sql = "delete from stores where storename = '"+storename+"';"
#sql ="SELECT name FROM sqlite_master WHERE type='table'";
cur.execute(sql)
rows = cur.fetchall()
for row in rows:
        print(str(row[0]))
conn.commit()
conn.close()

os.system("sudo rm -r ../store/"+storename+"")
