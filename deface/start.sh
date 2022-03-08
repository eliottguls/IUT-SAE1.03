#!/bin/bash
chmod +x script.sh
chmod +x script_2pdf.sh
chmod +x script_pdf.sh
chmod +x script_rename.sh
chmod +x script_website.sh
rm -r images_ano/
docker container run --rm --name thedeface -dti bigpapoo/deface bash
docker container run --rm --name html2pdf -dti bigpapoo/weasyprint bash
docker container cp images/ thedeface:/data/
docker container cp script.sh thedeface:/data/
docker exec thedeface ./script.sh
docker container cp thedeface:/data/images/ images_ano/	
cd images_ano/
rm $(ls | grep -v "_ano")
cd ../
./script_rename.sh
rm p*.jpg
./script_website.sh
docker container cp images_ano/ html2pdf:/work/
docker container cp script_pdf.sh html2pdf:/work/
docker exec html2pdf weasyprint images_ano/pele_mêle_3.html pele_mêle.pdf
docker container cp html2pdf:/work images_ano/
echo Floutage effectué

docker kill thedeface
docker kill html2pdf
