#-*- coding:utf-8 -*-
import sqlite3

storename = input()
conn = sqlite3.connect("../store/"+storename+"/imformation.db")

cur = conn.cursor()
#sql = "select id from "
sql = "select name from items"
#sql ="SELECT name FROM sqlite_master WHERE type='table'";
cur.execute(sql)
rows = cur.fetchall()
for row in rows:
        print(str(row[0]))
conn.close()
