#!/usr/bin/env python
from optparse import OptionParser
import sys, string
import smtplib
import math
parser = OptionParser()
# Command Line for message
parser.add_option("-t", "--text", 
                  dest="text", type="str", default="",
                  help = "Input text")

parser.add_option("-k", "--key", 
                  dest="key", type="str", default="0",
                  help = "Key")

parser.add_option("-d", "--decrypt", 
                  dest="dec",action='store_true',
                  help = "Decrypt")

parser.add_option("-e", "--encrypt", 
                  dest="enc",action='store_true',
                  help = "Encrypt")

(options, args) = parser.parse_args()

char_to_int_dict = {"/":0, "0":1 , "1":2 , "2":3 , "3":4 , "4":5 , "5":6 , "6":7 , "7":8 , "8":9 , "9":10 , "A":11 , "B":12 , "C":13 , "D":14 , "E":15 , "F":16 , "G":17 , "H":18 , "I":19 , "J":20 , "K":21 , "L":22 , "M":23 , "N":24 , "O":25 , "P":26 , "Q":27 , "R":28 , "S":29 , "T":30 , "U":31 , "V":32 , "W":33 , "X":34 , "Y":35 , "Z":36 , "a":37 , "b":38 , "c":39 , "d":40 , "e":41 , "f":42 , "g":43 , "h":44 , "i":45 , "j":46 , "k":47 , "l":48 , "m":49 , "n":50 , "o":51 , "p":52 , "q":53 , "r":54 , "s":55 , "t":56 , "u":57 , "v":58 , "w":59 , "x":60 , "y":61 , "z":62 , ",":63 , " ":64 , "!":65 , "@":66 , "#":67 , "$":68 , "%":69 , "^":70 , "&":71 , "*":72 , "(":73 , ")":74 , "-":75 , "=":76 , "_":77 , "+":78 , "[":79 , "]":80 , "?":81 , "{":82 , "}":83 , "<":84 , ";":85 , ".":86 , ":":87 , ">":88 , "~":89 , "\'":90 , "`":91 , "|":92 , "\"":93 , "\\":94 , "\n":95 , "\r":96}

int_to_char_dict = {0:"/", 1:"0" , 2:"1" , 3:"2" , 4:"3" , 5:"4" , 6:"5" , 7:"6" , 8:"7" , 9:"8" , 10:"9" , 11:"A" , 12:"B" , 13:"C" , 14:"D" , 15:"E" , 16:"F" , 17:"G" , 18:"H" , 19:"I" , 20:"J" , 21:"K" , 22:"L" , 23:"M" , 24:"N" , 25:"O" , 26:"P" , 27:"Q" , 28:"R" , 29:"S" , 30:"T" , 31:"U" , 32:"V" , 33:"W" , 34:"X" , 35:"Y" , 36:"Z" , 37:"a" , 38:"b" , 39:"c" , 40:"d" , 41:"e" , 42:"f" , 43:"g" , 44:"h" , 45:"i" , 46:"j" , 47:"k" , 48:"l" , 49:"m" , 50:"n" , 51:"o" , 52:"p" , 53:"q" , 54:"r" , 55:"s" , 56:"t" , 57:"u" , 58:"v" , 59:"w" , 60:"x" , 61:"y" , 62:"z" , 63:"," , 64:" " , 65:"!" , 66:"@" , 67:"#" , 68:"$" , 69:"%" , 70:"^" , 71:"&" , 72:"*" , 73:"(" , 74:")" , 75:"-" , 76:"=" , 77:"_" , 78:"+" , 79:"[" , 80:"]" , 81:"?" , 82:"{" , 83:"}" , 84:"<" , 85:";" , 86:"." , 87:":" , 88:">" , 89:"~" , 90:"\'" , 91:"`" , 92:"|" , 93:"\"" , 94:"\\" , 95:"\n" , 96:"\r"}

# Total number of characters to considered for the calculation. This number
# needs to be a prime for a successful decryption.
total_char = 89

# For converting the string key into array form
def key_to_array(key):
      key_ar = []
      key_ar.append([])
      no = ""
      r = 0;
      c = 0;
      for i in range(len(key)):
            if(key[i] == " "):
                  key_ar[r].append(int(no))
                  no = ""
                  c += 1			
            elif(key[i] == ";"):
                  key_ar[r].append(int(no))
                  no = ""
                  key_ar.append([])
                  r += 1
            elif(key[i].isdigit()):
                  no += key[i]
                  if(i == len(key)-1):
                        key_ar[r].append(int(no))
                        
      # Checking for square matrix
      if(len(key_ar) != 1):
            for i in range(len(key_ar)):
                  if(len(key_ar) != len(key_ar[i])):
                        return 0
            return key_ar
      else:
            return 0

# For multiplying the key and plain/cipher text.
def mat_multi(blk,key):
      pm = []
      for i in range(len(key)):
            k = 0
            for j in range(len(key)):
                  k += key[i][j]*blk[j]
                  print(key[i][j],blk[j])
            print("-----")      
            pm.append(k%total_char)
      return pm

# For finding the co-factor of mat(r,c). The values are always done 'mod total_char'
def co_factor (mat_c,r,c):
      mat1 = []
      for i in range(len(mat_c)):
            if(i == r):
                  continue
            mat1.append([])
            for j in range(len(mat_c[i])):
                  if(j == c):
                        continue
                  else:
                        mat1[len(mat1)-1].append(mat_c[i][j])
      return (((-1)**(r+c))*determinant_mod(mat1))
      
# For finding the determinant of mat. The values are always done 'mod total_char'
def determinant_mod(mat_d):
      if(len(mat_d) == 2):
            return (((mat_d[0][0])*(mat_d[1][1]))-((mat_d[0][1])*(mat_d[1][0])))
      elif(len(mat_d) == 1):
            return (mat_d[0][0])
      else:
            det = 0
            for i in range(len(mat_d[0])):
                  det += (mat_d[0][i]*co_factor(mat_d,0,i))%total_char
            return det%total_char		

# For calculating hte modular inverse of the matrix.
def inverse_mat(mat):
      for i in range(len(mat)):
            if(len(mat) != len(mat[i])):
                  return 0
      D = determinant_mod(mat)
      if(D == 0 or D %97 == 0):
            print("Determinant is zero.")
            return 0
      
      # The following inverse calculation is only valid for prime numbers
      # and can be proved by Euler's Totient Function
      inv_D = pow(D,total_char-2,total_char)
      
      inv_mat = []
      for l in range(len(mat)):
            inv_mat.append([0]*len(mat))
            
      for i in range(len(mat)):
            for j in range(len(mat[i])):
                  inv_mat[j][i] = (inv_D*co_factor(mat,i,j))%total_char
                  
      return inv_mat
      
def multiply(txt,mat,size):
      block = []
      plain = ""
      for i in range(len(txt)):
            if((txt[i]) in char_to_int_dict  and (char_to_int_dict[txt[i]] < total_char)):
                  if((i+1)%size != 0):
                        block.append(char_to_int_dict[txt[i]])
                  else:
                        block.append(char_to_int_dict[txt[i]])
                        cphr = mat_multi(block,mat)
                        block = []
                        for j in range(size):
                              plain += int_to_char_dict[cphr[j]]
            else:
                        plain = "Invalid characters entered."
                        break
      print(plain)

key_e = key_to_array(options.key)
if(key_e == 0):
      print("Invalid Key")
      sys.exit("Invalid Key")
size = len(key_e)
if(size < 2):
      print("Invalid Key. Key length is too small.")
      sys.exit("Invalid Key")
txt = options.text

# For decryption
if(options.dec):
      if(len(txt)%size != 0):
            print("Invalid Cipher Text")
            sys.exit("Invalid Cipher Text")
      mat = inverse_mat(key_e)
      if(mat != 0):
            multiply(txt,mat,size)
      else:
            sys.exit()

# For encryption
elif(options.enc):
      # Add extra spaces if the total number of plain characters
      # are not a multiple of the key order.
      if(len(txt)%size != 0):
            xtra =abs(len(txt) - math.ceil((len(txt)/size))*size)
            
            xtra = int(xtra)
            C='Z'
            txt=str(txt.ljust(xtra + len(txt), C))
            # print(txt,"->",xtra)
      multiply(txt,key_e,size)