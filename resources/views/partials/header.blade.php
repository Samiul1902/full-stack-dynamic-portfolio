<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* HEADER WRAPPER */
header{
    width: 100%;
    background: #050816;
    border-bottom: 2px solid #22c55e;
}

/* NAVBAR CONTAINER */
.navbar{
    max-width: 1100px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 70px;
    padding: 0 20px;
}

/* LOGO */
.logo a{
    font-size: 22px;
    font-weight: 700;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    color: #f9fafb;
    text-decoration: none;
}

.logo span{
    color: #22c55e;
}

/* MENU (DESKTOP) */
.menu ul{
    list-style: none;
    display: flex;
    gap: 40px;
}

.menu a{
    text-decoration: none;
    color: #9ca3af;
    font-size: 16px;
    font-weight: 500;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    position: relative;
    transition: color 0.2s ease;
}

.menu a::after{
    content: "";
    position: absolute;
    left: 0;
    bottom: -4px;
    width: 0;
    height: 2px;
    background: #22c55e;
    transition: width 0.2s ease;
}

.menu a:hover{
    color: #f9fafb;
}

.menu a:hover::after{
    width: 100%;
}

</style>


<header>
    <nav class="navbar">
        <div class="logo">
            <h2>
                <a href="#name">Samiul Hasan Sakib<span>.</span></a>
            </h2>
        </div>

        <div class="menu">
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#skills">Skills</a></li>
                <li><a href="#projects">Projects</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
    </nav>
</header>
