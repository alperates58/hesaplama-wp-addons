function hcKediVkiHesapla() {
    const rib = parseFloat(document.getElementById('hc-kvki-rib').value);
    const leg = parseFloat(document.getElementById('hc-kvki-leg').value);

    if (!rib || !leg) {
        alert('Lütfen tüm ölçümleri giriniz.');
        return;
    }

    // FBMI Formula: (((Rib Circumference / 0.7062) - Lower Leg Length) / 0.9156) - Lower Leg Length
    // Not: Literatürde farklı FBMI formülleri vardır, en yaygın olanı:
    // FBMI = (Rib / (0.7062 * Leg^0.5)) - Leg -- Bu biraz daha karmaşıktır.
    // Basitleştirilmiş yaygın FBMI:
    const fbmi = ((rib / 0.7062) - leg) / 0.9156 - leg;

    const resVal = document.getElementById('hc-kvki-res-val');
    const resStatus = document.getElementById('hc-kvki-res-status');

    resVal.innerText = fbmi.toFixed(1).toLocaleString('tr-TR');

    if (fbmi < 15) {
        resStatus.innerText = "Düşük Kilolu";
        resStatus.style.color = "#3498db";
    } else if (fbmi >= 15 && fbmi <= 29.9) {
        resStatus.innerText = "İdeal Kiloda";
        resStatus.style.color = "#27ae60";
    } else if (fbmi >= 30 && fbmi <= 42) {
        resStatus.innerText = "Fazla Kilolu";
        resStatus.style.color = "#f1c40f";
    } else {
        resStatus.innerText = "Obez";
        resStatus.style.color = "#e74c3c";
    }

    document.getElementById('hc-kedi-vki-result').classList.add('visible');
}
