
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Vertical Menu</title>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

	<style>
	body {
    margin: 0;
    font-family: sans-serif;
    display: flex;
	background-color:black;
	color: #ffff;
	}

.sidebar {
    width: 60px; /* Collapsed width */
    height: 100vh;
    background-color: #ffff;
    color: white;
    transition: width 0.5s;
    position: fixed;
    top: 0;
    left: 0;
}

.sidebar.expanded {
    width: 250px; /* Expanded width */
}

.toggle-btn {
    background-color: #555;
    color: white;
    border: none;
    padding: 15px;
    width: 100%;
    text-align: left;
    font-size: 20px;
    cursor: pointer;
}

.menu-items {
    padding-top: 10px;
}

.menu-item {
    display: block;
    padding: 15px;
    color: white;
    text-decoration: none;
    white-space: nowrap;
}

.menu-item:hover {
    background-color: #575757;
}

.main-content {
    margin-left: 60px; /* Initial margin to offset collapsed sidebar */
    padding: 20px;
    flex-grow: 1;
    transition: margin-left 0.5s;
}

.main-content.shifted {
    margin-left: 250px; /* Margin to offset expanded sidebar */
}

#content-display {
    margin-top: 20px;
    padding: 20px;
    background-color: #f4f4f4;
    border-radius: 5px;
}

</style>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn = document.getElementById('toggle-sidebar');
    const sidebar = document.querySelector('.sidebar');
    const mainContent = document.getElementById('main-content');
    const menuItems = document.querySelectorAll('.menu-item');
    const contentDisplay = document.getElementById('content-display');

    // Toggle sidebar visibility
    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('expanded');
        mainContent.classList.toggle('shifted');
    });

    // Load external content
    menuItems.forEach(item => {
        item.addEventListener('click', async (e) => {
            e.preventDefault(); // Prevent default link behavior
            
            const target = item.getAttribute('data-target');
            const url = `content/${target}.json`; // Path to the external content file
            
            try {
                const response = await fetch(url);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                const data = await response.json();
                
                // Update the content display area
                contentDisplay.innerHTML = `
                    <h2>${data.title}</h2>
                    <p>${data.body}</p>
                `;
            } catch (error) {
                console.error("Could not fetch content:", error);
                contentDisplay.innerHTML = `<p>Error loading content.</p>`;
            }
        });
    });
});

</script>
</head>
<body>

  

    <div class="">
        <button class="toggle-btn" id="toggle-sidebar">☰</button>
        <div class="menu-items" id="menu-items">
            <a href="#" class="menu-item" data-target="home"><i class='fas fa-file-audio' style='font-size:24px;color:red'></i>
</a>
            <a href="#" class="menu-item" data-target="about">About</a>
            <a href="#" class="menu-item" data-target="services">Services</a>
            <a href="#" class="menu-item" data-target="contact">Contact</a>
        </div>
    </div>

    <div class="main-content" id="main-content">
	<P>&nbsp;</P>	          		
  <P>&nbsp;</P>	          		
  <P>&nbsp;</P>	          		
  <P>&nbsp;</P>	          		
  <P>&nbsp;</P>	   
	          		<CENTER>
  <h2>WWW.BUSY-PAGE.COM</h2>	

  <input class="form-controllllllll" type="search" placeholder="Search" aria-label="Search" style='width:500px;height:40px'>
  <button class="btn" type="submit">Search</button>



  </CENTER>
  

  <P>&nbsp;</P>	          		
         		

        <div id="">
		
		</div>
    </div>

   

</body>
</html>
