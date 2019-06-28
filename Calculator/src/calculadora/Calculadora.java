/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package calculadora;
import javax.swing.*;
import java.awt.event.*;
import java.awt.*;
import java.awt.Color;
import java.awt.Font; 
/**
 *
 * @author JEISSON
 * @override
 */

public  class Calculadora extends JFrame implements ActionListener{
 private JButton b1,b2,b3,b4,b5,b6,b7,b8,b9,b0, suma,resta,mult,div,res,ce;
 private JTextField num1,num2,resultado;
 String a="",b="",signo="";
 Font fuente;
 
    public Calculadora()
            {

                setLayout(null);
                
                
              res=new JButton("=");
               res.setBounds(120,150,45,20);
               add(res);
               res.addActionListener(this);
                
                   ce=new JButton("CE");
               ce.setBounds(0,150,55,20);
               add(ce);
               ce.addActionListener(this);
               
                num1=new JTextField();
               num1.setBounds(0,0,250,60);
               add(num1);
               
               fuente = new Font("calibri",3,20);
                num1.setFont(fuente);
                
               suma=new JButton("+");
                suma.setBounds(190,75,45,20);
                add(suma);
                suma.addActionListener(this);
                
                resta=new JButton("-");
                resta.setBounds(190,100,45,20);
                add(resta);
                resta.addActionListener(this);
                
                mult=new JButton("x");
                mult.setBounds(190,125,45,20);
                add(mult);
                mult.addActionListener(this);
                
                div=new JButton("/");
                div.setBounds(190,150,45,20);
                add(div);
                div.addActionListener(this);
                
                b1=new JButton("1");
                b1.setBounds(10,75,45,20);
                add(b1);
                b1.addActionListener(this);
                 b2=new JButton("2");
                b2.setBounds(65,75,45,20);
                add(b2);
                b2.addActionListener(this);
                 b3=new JButton("3");
                b3.setBounds(120,75,45,20);
                add(b3);
                b3.addActionListener(this);
                 b4=new JButton("4");
                b4.setBounds(10,100,45,20);
                add(b4);
                b4.addActionListener(this);
                 b5=new JButton("5");
                b5.setBounds(65,100,45,20);
                add(b5);
                b5.addActionListener(this);
                 b6=new JButton("6");
                b6.setBounds(120,100,45,20);
                add(b6);
                b6.addActionListener(this);
                 b7=new JButton("7");
                b7.setBounds(10,125,45,20);
                add(b7);
                b7.addActionListener(this);
                 b8=new JButton("8");
                b8.setBounds(65,125,45,20);
                add(b8);
                b8.addActionListener(this);
                
                b9=new JButton("9");
                b9.setBounds(120,125,45,20);
                add(b9);
                b9.addActionListener(this);
                 b0=new JButton("0");
                b0.setBounds(65,150,45,20);
                add(b0);
                b0.addActionListener(this);
            }
    
    public void  actionPerformed(ActionEvent e){
        
        String texto="",z="";
        int c=0;
        
        
         if(e.getSource()==ce)
		{
                    
	         num1.setText("");
                 
		}
         
         if(e.getSource()==suma)
		{
                    a=num1.getText();
	         num1.setText("");
                 signo="+";
		}
         
       else if(e.getSource()==resta)
		{
	           a=num1.getText();
	         num1.setText("");
                 signo="-";
		}
           else if(e.getSource()==mult)
		{
	           a=num1.getText();
	         num1.setText("");
                 signo="*";
		}
           else if(e.getSource()==div)
		{
	           a=num1.getText();
	         num1.setText("");
		signo="/";
                }
               
       
        if(e.getSource()==b1)
		{
	         
                 texto+=num1.getText()+"1";
                 num1.setText(texto);
                 
		}
        if(e.getSource()==b2)
		{
	         texto+=num1.getText()+"2";
                 num1.setText(texto);
		}
        if(e.getSource()==b3)
		{
	          texto+=num1.getText()+"3";
                 num1.setText(texto);
		}
        if(e.getSource()==b4)
		{
	          texto+=num1.getText()+"4";
                 num1.setText(texto);
		}
        if(e.getSource()==b5)
		{
	          texto+=num1.getText()+"5";
                 num1.setText(texto);
		}
        if(e.getSource()==b6)
		{
	          texto+=num1.getText()+"6";
                 num1.setText(texto);
		}
        if(e.getSource()==b7)
		{
	          texto+=num1.getText()+"7";
                 num1.setText(texto);
		}
        if(e.getSource()==b8)
		{
	          texto+=num1.getText()+"8";
                 num1.setText(texto);
		}
        if(e.getSource()==b9)
		{
	          texto+=num1.getText()+"9";
                 num1.setText(texto);
		}
        if(e.getSource()==b0)
		{
	          texto+=num1.getText()+"0";
                 num1.setText(texto);
		}
 if(e.getSource()==res)
		{
                    b=num1.getText();
                    
                    if(signo.equals("+"))
                 {
                     
                     c=Integer.parseInt(a)+ Integer.parseInt(b);
                     z=String.valueOf(c);
                     num1.setText(z);
                 }
                 else if(signo.equals("-"))
                 {
                      c=Integer.parseInt(a)- Integer.parseInt(b);
                     z=String.valueOf(c);
                     num1.setText(z);
                 }
                 else if(signo.equals("*"))
                 {
                      c=Integer.parseInt(a)* Integer.parseInt(b);
                     z=String.valueOf(c);
                     num1.setText(z);
                 }
                 else if(signo.equals("/"))
                 {
                      c=Integer.parseInt(a)/ Integer.parseInt(b);
                     z=String.valueOf(c);
                     num1.setText(z);
                 }
        
                 
		}
 
    }

    /**
     * @param args the command line arguments
     */
   
    public static void main(String[] args) {
        // TODO code application logic here
   
        Calculadora calculadora= new Calculadora();
        
        calculadora.setVisible(true);
	calculadora.setBounds(0,0,250,300);
	calculadora.setResizable(false);
	calculadora.setLocationRelativeTo(null);
    }
    
}
