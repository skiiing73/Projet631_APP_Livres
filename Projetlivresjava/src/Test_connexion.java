import java.sql.*;

public class Test_connexion {

	public static void main(String[] args) throws Exception {
		Class.forName("com.mysql.cj.log.Slf4JLogger");

		Connection con = DriverManager.getConnection(Config.url, Config.user, Config.password);
		if (con != null) {
			System.out.println("Database Connected successfully");
			//étape 3: créer l'objet statement 
		      Statement stmt = con.createStatement();
		      ResultSet res = stmt.executeQuery("SELECT * FROM livre");
		      //étape 4: exécuter la requête
		      while(res.next())
		        System.out.println(res.getInt(1)+"  "+res.getString(2)
		        +"  "+res.getString(3));
		      //étape 5: fermer l'objet de connexion
		      con.close();

			         System.out.println("data selected successfully");
		} else {
			System.out.println("Database Connection failed");
		}
	}
}