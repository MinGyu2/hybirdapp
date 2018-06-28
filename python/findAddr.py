#-*- coding:utf-8 -*-
import sqlite3

sname= input()
conn = sqlite3.connect("../store/store.db")

cur = conn.cursor()
sql = "select address from stores where storename='"+sname+"'"
#sql = "select storename from stores"
#sql ="SELECT storename FROM sqlite_master WHERE type='table'";
cur.execute(sql)
rows = cur.fetchall()
print(rows[0][0])
conn.close()
