function hcGkaHesapla() {
    var burned = parseFloat(document.getElementById('hc-gka-burned').value);
    var taken = parseFloat(document.getElementById('hc-gka-taken').value);

    if (isNaN(burned) || isNaN(taken)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    var deficit = burned - taken;
    var resDiv = document.getElementById('hc-gka-result');
    var valDiv = document.getElementById('hc-gka-val');
    var yorumDiv = document.getElementById('hc-gka-yorum');

    valDiv.textContent = deficit.toLocaleString('tr-TR') + " kcal";

    if (deficit > 0) {
        valDiv.className = "hc-result-value normal";
        yorumDiv.textContent = "Günlük kalori açığınız mevcuttur. Bu şekilde devam ederseniz kilo vermeniz beklenir.";
    } else if (deficit < 0) {
        valDiv.className = "hc-result-value danger";
        yorumDiv.textContent = "Kalori fazlanız bulunmaktadır. Bu durum kilo almanıza neden olabilir.";
    } else {
        valDiv.className = "hc-result-value warning";
        yorumDiv.textContent = "Kalori dengesindesiniz. Kilonuzun sabit kalması beklenir.";
    }

    resDiv.classList.add('visible');
}
