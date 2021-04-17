from pytube import YouTube
import shutil
import sys
import os

if len(sys.argv) >= 2:
    folderpath = "C:/xampp/htdocs/stock/public/mp4"
    if os.path.isdir(folderpath):
        shutil.rmtree(folderpath)
    YouTube(sys.argv[1]).streams.first().download('C:/xampp/htdocs/stock/public/mp4')
