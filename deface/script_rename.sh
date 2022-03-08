#!/bin/bash
i=1
for fic in images_ano/*
do
	mv $fic p$i.jpg
	echo rename p$i.jpg processing
	cp p$i.jpg images_ano/
	((i=i+1))
done


