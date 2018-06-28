#-*- coding:utf-8 -*-
import sqlite3

sname = input()

conn = sqlite3.connect("../store/"+sname+"/imformation.db");

cur = conn.cursor()
#sql = "select id from "
sql = "select * from customs"
#sql ="SELECT storename FROM sqlite_master WHERE type='table'";
cur.execute(sql)
rows = cur.fetchall()
for row in rows:
	print("<li style='font-size:20px'>")
	print("<form action='orderview.php' method='post'>")
	print("<div onclick='submitss(this)'>")
	print("<input name='id' type='hidden' value='"+row[0]+"'/>")
	print("<input id='sname' name='sname' type='hidden' value='"+sname+"'/>")
	print("ID : "+str(row[0])+"<br>")
	print("Name : "+str(row[2]))
	print("</div>")
	print("</form>")
	print("</li>")
conn.close()
