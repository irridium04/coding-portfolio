
package php_sql_sanitize_code_generator;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
import java.util.Scanner;



/*
    Code by Collin Shook

    This program auto generates PHP code to sanitize and insert data 
    into a database. It prompts the user for the table name and the
    names of the database fields.

    Includes code for password hashing if the field name is "pwd".
 */
public class PHP_SQL_Code_Generator 
{
    // scanner object for line reading
    static Scanner myScan = new Scanner(System.in);
    
    public static void main(String[] args) 
    {
        // get the table name
        String tableName = getTableName();
        
        // get a list of all the table fields
        List<String> vars = getVariables();
        
        // add the auto generated comment and create the string to hold all the code
        String code = "// *** AUTO GENERATED BY PHP_SQL_Code_Generator.java *** \n";
        
        // add SQL statement code to string
        code += createSQLStatement(tableName, vars);
        
        code += "\n$sql_Insert =  $pdo->prepare($sql_Insert);\n";
        
        code += formatSanitizer(vars);
        
        code += "\n";
        
        code += bindParameters(vars);
        
        code += "\n$sql_Insert->execute();";
        
        code += "\n\n// *** END AUTO GENERATED CODE ***";
        
        System.out.println("\n Generated Code: \n");
        
        System.out.println(code); // print the code to the console to be copied
    }

    // prompts the user for the table name
    private static String getTableName() 
    {
        System.out.println("Enter table name:");
        String tableName = myScan.nextLine();    
        
        return tableName;
    }
    
    private static List<String> getVariables() 
    {
        List<String> vars; // create a list

        // print to console
        System.out.println("Enter variable names seperated by a comma. No spaces");
        
        // get user response
        String varNames = myScan.nextLine();
        
        // convert the user response to a list
        vars = Arrays.asList(varNames.split(","));
        
        return vars; // return the list
    }

    // generates sanitizer code
    private static String formatSanitizer(List<String> vars) 
    {
        String code = "";
        
        // iterate through fields
        for(String var : vars)
        {
            var = var.replaceAll("\\s", ""); // remove spaces
            
            // add password hashing code if the field is "pwd"
            if(var.equals("pwd"))
            {
                code += "\n\n// *********** PASSWORD *************************\n" +
                "\n" +
                "$pwd = $_POST['pwd'];\n" +
                "\n" +
                "$password = password_hash($pwd, PASSWORD_DEFAULT);\n" +
                "\n" +
                "// **************************************************\n\n";
            }
            else
            {
                code += "$"+ var +" = filter_var($_POST['" + var + "'], FILTER_SANITIZE_STRING);\n";
            }
        }
        
        return code;
    }

    // generates the SQL statement code
    private static String createSQLStatement(String dbName, List<String> vars) 
    {
        String code = "$sql_Insert =  	\"INSERT INTO " + dbName + "\".\n\"(";
         
        int i = 0; // counter
        
        for(String var : vars) // iterate through fields
        {
            var = var.replaceAll("\\s", ""); // remove spaces
            
            code += var; // add var to the string
            
            // adds a comma if not the last item in list
            if(i != vars.size() - 1)
            {
                code += ",";
            }
            
            i++; // increment counter
        }
        
        code += ") \".\n\"VALUES(";
          
        i = 0; // reset counter to 0
        
        for(String var : vars) // iterate through fields again
        {
            var = var.replaceAll("\\s", ""); // remove spaces
            
            code += ":" + var; // places a colon before the var name
            
            // adds a comma if not last item in list
            if(i != vars.size() - 1)
            {
                code += ",";
            }
            
            i++; // increment counter
        }
                
        code += ")\";\n";
        
        return code;
    }

    private static String bindParameters(List<String> vars) 
    {
        String code = "";
        
        for(String var : vars)
        {
            var = var.replaceAll("\\s", ""); // remove spaces
            
            // check if field is named pwd
            if(var.equals("pwd"))
            {
                code += "$sql_Insert->bindparam(\"" + var + "\", $password" + ");\n";
            }
            else
            {
                code += "$sql_Insert->bindparam(\"" + var + "\", $" + var + ");\n";
            }
        }
        
        return code;
    }

    
    
}
