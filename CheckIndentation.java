package project1;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;

public class CheckIndentation {
    public static void main(String[] args) {
    	String filePath = "indent.bml";
    	 try (BufferedReader reader = new BufferedReader(new FileReader(filePath))) {
             String line;
             int linenumber = 0;
             int a = 0;
             int b = 0;
             int e = 0,d=0;
             int c=0;
             boolean insideForLoop = false;
  
             while ((line = reader.readLine()) != null) {
             	linenumber++;
             	if(insideForLoop) {
               	 e=e+1;
               	 if(c>countLeadingSpaces(line) && e==1) {
               		 System.out.println("no indentation followed "+linenumber+" "+a+b);
               	 }
               	 if(d>countLeadingSpaces(line))
               	 d=countLeadingSpaces(line);
                }
 
                 if (line.contains("for")) {
                     insideForLoop = true;
                     a = a+1;
                     c=c+1;
                     e=0;
                     
                 }
                 
                 // You may add more conditions or actions based on your specific requirements
  
                 if (line.contains("}")) {
                	 b=b+1;
                	 c=0;
                	 if(a==b) {
                      insideForLoop = false;
                      a=0;
                      b=0;
                      e=0;
                	 }
                	 a=a-1;
                	 b=b-1;
                 }
             }
         } catch (IOException e) {
             System.err.println("Error reading the file: " + e.getMessage());
         }
     }
    private static int countLeadingSpaces(String line) {
        int count = 0;
        for (char c : line.toCharArray()) {
            if (c == ' ') {
                count++;
            } else {
                break;
            }
        }
        return count;
    }
 }
                