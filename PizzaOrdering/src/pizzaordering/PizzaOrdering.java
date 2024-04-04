package pizzaordering;

import java.awt.Color;

/*
    Code By Collin Shook

    This program allows the user to use a UI to create a pizza. They can
    select the size, toppings, and delivery options. This is used to build a
    ticket / recipt that displays the toppings and price. The user can
    then choose to open the printer menu to print the recipt or save as a PDF.
    
*/


public class PizzaOrdering
{


    public static void main(String[] args)
    {
        PizzaForm myFrame = new PizzaForm(); // instantiate a new java frame
        myFrame.setVisible(true); // set it visible
        myFrame.setLocationRelativeTo(null); // center on the screen

        // set the background color
        myFrame.getContentPane().setBackground(Color.decode("#dba24a"));

        // set the title
        myFrame.setTitle("Pizza Builder - Collin S");
    }

}
