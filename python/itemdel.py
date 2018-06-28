#-*- coding:utf-8 -*-
import sqlite3
import os

storename = input()
name = input()

conn = sqlite3.connect("../store/"+storename+"/imformation.db")

cur = conn.cursor()

#img name
sql = "delete from items where name = '"+name+"';"
#sql = 'insert into items values("'+name+'","'+text+'")'
#sql ="insert into member values('name','ids','pwd','storelocation','phonenum','email')"
cur.execute(sql)
rows = cur.fetchall()
conn.commit()
conn.close()

os.system("sudo rm -r ../store/"+storename+"/img/"+name+"")
