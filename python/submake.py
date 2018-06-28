#-*- coding:utf-8 -*-
import sqlite3
import os

sname = input()

ids = input()
pwd = input()
name = input()
email = input()



if(ids != "root" and sname !="root"):
	conn = sqlite3.connect("../store/"+sname+"/imformation.db")
	cur = conn.cursor()
	sql = 'insert into customs  values("'+ids+'","'+pwd+'","'+name+'","'+email+'")'
	cur.execute(sql)
	rows = cur.fetchall()
	conn.commit()
	conn.close()
	os.system("cp -r ../store/"+sname+"/custom/root ../store/"+sname+"/custom/"+ids+"");
	os.system("sudo chown www-data:www-data ../store/"+sname+"/custom/"+ids+"")
	os.system("sudo chown www-data:www-data ../store/"+sname+"/custom/"+ids+"/orders.db")
