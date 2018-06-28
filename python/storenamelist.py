#-*- coding:utf-8 -*-
import sqlite3

conn = sqlite3.connect("../store/store.db")

cur = conn.cursor()
#sql = "select id from "
sql = "select storename from stores"
#sql ="SELECT storename FROM sqlite_master WHERE type='table'";
cur.execute(sql)
rows = cur.fetchall()
for row in rows:
        print(str(row[0]))
conn.close()
