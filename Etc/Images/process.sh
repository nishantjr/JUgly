#! /bin/bash
base='/home/nishant/Programs/Server/xmission/Static/Images'
# Make Larger icons for 'thanks to...' page
cd Sponsors
for f in *;
do
  echo "Resizing $f file..";
  name=${f%\.*}
  convert "$f" -resize '100x35>' -strip "$base/Sponsors/Small/$name.png"
  convert "$f" -resize '100x75>' -strip "$base/Sponsors/Big/$name.png"
done
cd ../

cd Sponsors_big
for f in *;
do
  echo "Resizing $f file..";
  name=${f%\.*}
  convert "$f" -resize '100x35>' -strip "$base/Sponsors/Small/$name.png"
  convert "$f" -resize '270x60>' -strip "$base/Sponsors/Big/$name.png"
done
cd ../


cd Background
for f in *;
do
  echo "Processing $f file..";
  convert "$f" +level 95%,100% "$f.tmp"
# make width 400
  name=${f%\.*}
  convert "$f.tmp" -resize '500x300>' -strip "$base/Background/$name.png"
  rm "$f.tmp"
done
cd ../

cd Content
for f in *;
do
  echo "Resizing $f file..";
  name=${f%\.*}
  #convert "$f" -resize '800x600>' -strip "$base/Content/Large/$name.jpg"
  convert "$f" -resize '480x240>' -strip -quality 80 "$base/Content/Thumbnails/$name.jpg"
done
cd ../

cd Content_png
for f in *;
do
  echo "Resizing $f file..";
  name=${f%\.*}
  #convert "$f" -resize '800x600>' -strip "$base/Content/Large/$name.jpg"
  convert "$f" -resize '480x240>' -strip -quality 80 "$base/Content/Thumbnails/$name.png"
done
cd ../

cd Video
for f in *;
do
  echo "Doing $f";
  name=${f%\.*}
  echo "Making Ogg"
  ffmpeg2theora --videobitrate 200 --max_size 480x240 --output "$base/Video/$name.ogv" "$f"
  echo "Making MP4"
  HandBrakeCLI --preset "iPhone & iPod Touch" --vb 200 --height 240 --two-pass --turbo --optimize --input "$f" --output "$base/Video/$name.mp4"

done