#-*- coding:utf-8 -*-
import sqlite3
import os

ids = input()
pwd = input()
name = input()
storename = input()
email = input()
address = input()

if(ids != "root" and storename !="root"):
	conn = sqlite3.connect("../store/store.db")
	cur = conn.cursor()
	sql = 'insert into stores values("'+ids+'","'+pwd+'","'+name+'","'+storename+'","'+email+'","'+address+'")'
	cur.execute(sql)
	rows = cur.fetchall()
	conn.commit()
	conn.close()
	os.system("cp -r ../store/root ../store/"+storename+"");
	os.system("sudo chown www-data:www-data ../store/"+storename+"")
	os.system("sudo chown www-data:www-data ../store/"+storename+"/img")
	os.system("sudo chown www-data:www-data ../store/"+storename+"/imformation.db")
	os.system("sudo chown www-data:www-data ../store/"+storename+"/custom")
#imformation.db
