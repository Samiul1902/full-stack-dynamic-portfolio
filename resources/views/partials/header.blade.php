<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .navbar{
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 60px;
        border: 2px solid black;
    }
    .menu ul{
        list-style: none;
        display: flex;
        gap: 60px;
    }
</style>


<nav class="navbar">
    <div class="logo">
        <h2>My Portfolio</h2>
    </div>
    <div class="menu">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/skills">Skills</a></li>
            <li><a href="/projects">Projects</a></li>
        </ul>
    </div>
</nav>