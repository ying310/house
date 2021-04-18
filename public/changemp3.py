from moviepy.editor import *
from os import listdir, mkdir
from os.path import isfile, isdir, join, splitext

mypath = "/var/www/house/public/mp4/"
# mypath = "F:/python_demo/demo/"
files = listdir(mypath)
for i in files:
    root, ext = splitext(i)
    if ext == '.mp4':
        path = "/var/www/house/public/mp3/"
        if not isdir(path):
            mkdir(path)
        video = VideoFileClip(mypath+i)
        video.audio.write_audiofile(path+root+'.mp3')


