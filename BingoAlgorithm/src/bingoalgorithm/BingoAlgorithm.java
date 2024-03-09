package bingoalgorithm;

import java.util.Random;
import java.util.Scanner;


/*
    This program allows a user to enter a board size (n) and showcases
    an algorithm to find if an n in a row win condition is met. 
    (Tic Tac Toe, Bingo, etc.) 
*/



class Board
{
    public int size; // the dimensions of the board
    
    boolean[] slots; // an array to store the slots

    public Board(int size) // constructor
    {
        this.size = size;
        
        slots = new boolean[size * size]; // initialize array
    }
    
    // function to check for win condition
    public boolean checkForWin()
    {
        // a win is true if any of the functions are true
        return (rows() || columns() || TLtoBR() || TRtoBL());
    }

    // case 1, rows
    boolean rows()
    {
        boolean rowIsFull = false;
        boolean trueCase = true; // flag boolean
        
        // iterate through all left side cells
        for(int i = 0; i < size * size; i += size)
        {
            trueCase = true; // set to true every iteration
            for(int j = i; j < i + size; j++) // traverse right across rows
            {
                // if a false (empty) slot is found, break because it can't be a true case
                if(!slots[j])
                {
                    trueCase = false;
                    break;
                }
            }
            
            // if the truecase bool is true after the inner loop, a win has been found
            if(trueCase)
            {
                // break since a win has been found
                rowIsFull = true;
                break;
            }
        }
        
        return rowIsFull;
    }
    
    // case 2, columns
    boolean columns()
    {
        boolean colIsFull = false;
        boolean trueCase = true; // flag boolean
        
        // iterate through all top cells
        for(int i = 0; i < size; i++)
        {
            trueCase = true;
            for(int j = i; j < size * size; j += size) // traverse down columns
            {
                // if a false (empty) slot is found, break because it can't be a true case
                if(!slots[j])
                {
                    trueCase = false;
                    break;  
                }
            }
            
            // if the truecase bool is true after the inner loop, a win has been found
            if(trueCase)
            {
                // break since a win has been found
                colIsFull = true;
                break;
            }
        }
        
        return colIsFull;
    }
    
    // case 3, diagonal top left to bottom right
    boolean TLtoBR()
    {
        // iterate, starting at 0, by the size + 1 to get diagonal cells
        for(int i = 0; i < size * size; i += size + 1)
        {
            // if an empty slot is found, return false and break out of loop
            if(!slots[i])
            {
                return false;   
            }
        }
        
        // if the end of the loop is reached, a win case is true
        return true;
    }
    
    // case 4, diagonal top right to bottom left
    boolean TRtoBL()
    {
        // iterate, starting at size - 1, by size - 1, to get the other diagonal cells
        for(int i = size - 1; i <= (size * size - 1); i += size - 1)
        {
            // if an empty slot is found, return false and break out of loop
            if(!slots[i])
            {
                return false;   
            }
        }
        
        // if the end of the loop is reached, a win case is true
        return true;
    }
    
    // a function to display the board in the terminal
    void displayBoard()
    {
        // iterate through rows
        for(int i = 0; i < size; i++)
        {
            // iterate through columns
            for(int j = 0; j < size; j++)
            {
                // evaluate slot and print X or - depending on boolean value
                String slot = (slots[(i * size) + j]) ? "X" : "-";
                
                System.out.print(slot + " ");
            }
            
            System.out.println(""); // new line on each row iteration
        }
        
        System.out.println(""); // spacing
        
        // print the current win state
        System.out.println(checkForWin() ? "Win" : "No Win"); 
    }
    
    
    // function to randomly fill an unoccupied slot on the board
    void insertRandom()
    {
        // random number generator
        Random RNG = new Random();
        
        // random slot number
        int slot = RNG.nextInt(size * size);
        
        // loop and create a new number until an empty (false) slot is found
        while(slots[slot])
        {
            slot = RNG.nextInt(size * size);
        }
        
        // set the empty slot to filled
        slots[slot] = true;
    }
    
}



public class BingoAlgorithm 
{
    static Scanner myScan = new Scanner(System.in);
    
    public static void main(String[] args) 
    {
        System.out.println("Enter a board width (must be 3 or greater)");
        
        int size = 0;
        
        // check for integer input
        try
        {
            size = Integer.parseInt(myScan.nextLine());
        }
        catch (NumberFormatException e)
        {
            System.out.println("Invalid input");
        }
        
        // check if size is less than 3
        if(size < 3)
        {
            System.out.println("Invalid input");
            return;
        }
        
        // create a board
        Board b = new Board(size);
        
        // randomly fill the board until a win case
        while (!b.checkForWin())
        {
            b.insertRandom();
            b.displayBoard();
            
            myScan.nextLine(); // wait for enter key to iterate
        }
        
    }
    
}
