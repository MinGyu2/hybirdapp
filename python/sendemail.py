#-*- coding:utf-8 -*-
import os
addr = input()
rns = input()
os.system("echo "+ rns +" | ssmtp "+addr);
