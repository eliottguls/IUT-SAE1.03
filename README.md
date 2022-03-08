# SAE1.03

Docker project

## Contributors :

- Eliott GUILLOSSOU
- Axel MICHELO
- Zammit Emilie
- Posnic Alan

## Context : 

The client wants to produce photo montages from batches of all kinds of images where
include people. It is imperative to blur the faces of these
people on the mounts.

## Instructions

The images will be submitted in batches accompanied by an assembly configuration
(going with a model) <br>
Each image will be blurred then as many edits as necessary will be produced
for all images to be used. <br>
The workflow must take a precise account of the documents processed in order to produce
documents for the company's accounting because the customer will be invoiced at the volume of
service consumed. A summary document will be produced (format to be defined) at the
request. <br>

## Utilisation

To be able to allow the script to create the pdf of the pele(s)-mêle(s) with the blurred images provided, you will have to follow these steps to ensure its proper functioning:

- download the deface file
- insert your images to be blurred in the images folder
- open a terminal in the deface folder
- enter the command chmod +x start.sh
- to finish enter the command ./start.sh

you will be able to observe the result in the folder which will be named work
