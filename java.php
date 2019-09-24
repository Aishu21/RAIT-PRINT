<?php




$printcmd = "java -classpath C:\wamp64\www\RAIT PRINT\pdfbox-app-1.7.1jar org.apache.pdfbox.PrintPDF -silentPrint -printerName 2492E5000000 mirrawresume.pdf";
exec($printcmd);

?>