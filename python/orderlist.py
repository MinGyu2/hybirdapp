#-*- coding:utf-8 -*-
import sqlite3

sname = input()
ids = input()

conn = sqlite3.connect("../store/"+sname+"/custom/"+ids+"/orders.db");

cur = conn.cursor()
#sql = "select id from "
sql = "select * from orderitem"
#sql ="SELECT storename FROM sqlite_master WHERE type='table'";
cur.execute(sql)
rows = cur.fetchall()
for row in rows:
	print("<li style='font-size:20px'>"+str(row[1])+" : "+str(row[0])+"<br>"+row[2]+"원</li>")
conn.close()
