<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website <span id="copyright-year"></span></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->
<script>
    const copyrightYearElement = document.getElementById('copyright-year');
    const currentYear = new Date().getFullYear();
    copyrightYearElement.textContent = currentYear;
</script>