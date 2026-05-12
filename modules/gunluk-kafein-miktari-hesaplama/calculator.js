function hcKafeinHesapla() {
    const filter = parseInt(document.getElementById('hc-caf-filter').value) || 0;
    const espresso = parseInt(document.getElementById('hc-caf-espresso').value) || 0;
    const turkish = parseInt(document.getElementById('hc-caf-turkish').value) || 0;
    const tea = parseInt(document.getElementById('hc-caf-tea').value) || 0;
    const energy = parseInt(document.getElementById('hc-caf-energy').value) || 0;
    const soda = parseInt(document.getElementById('hc-caf-soda').value) || 0;

    // 2026 Standard values (mg)
    const total = (filter * 95) + (espresso * 63) + (turkish * 65) + (tea * 45) + (energy * 80) + (soda * 35);
    const limit = 400;

    document.getElementById('hc-caf-total').innerText = total.toLocaleString('tr-TR') + ' mg';
    
    const statusDiv = document.getElementById('hc-caf-status');
    const progressBar = document.getElementById('hc-caf-progress');
    const percentage = Math.min((total / limit) * 100, 100);

    progressBar.style.width = percentage + '%';

    if (total <= limit) {
        statusDiv.innerHTML = '<span style="color: #27ae60;">✔ Güvenli Sınır İçindesiniz</span>';
        progressBar.style.backgroundColor = '#2ecc71';
    } else {
        statusDiv.innerHTML = '<span style="color: #e74c3c;">⚠ Güvenli Sınırı Aştınız!</span>';
        progressBar.style.backgroundColor = '#e74c3c';
    }

    document.getElementById('hc-caffeine-result').classList.add('visible');
}
