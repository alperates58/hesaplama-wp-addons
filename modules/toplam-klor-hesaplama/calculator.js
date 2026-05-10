function hcToplamKlorHesapla() {
    const free = parseFloat(document.getElementById('hc-tc-free').value);
    const total = parseFloat(document.getElementById('hc-tc-total').value);

    if (isNaN(free) || isNaN(total)) return;

    // Bağlı Klor = Toplam Klor - Serbest Klor
    const combined = total - free;

    document.getElementById('hc-tc-stats').innerHTML = `
        🧪 <strong>Serbest Klor:</strong> ${free.toFixed(2)} mg/L<br>
        🧪 <strong>Bağlı Klor (Kloramin):</strong> ${combined.toFixed(2)} mg/L<br>
        📊 <strong>Toplam Klor:</strong> ${total.toFixed(2)} mg/L<br>
        <p style="font-size:0.85em; color:#666; margin-top:10px;">*Not: Bağlı klorun 0.2 mg/L'yi aşması durumunda şok klorlama önerilebilir.</p>
    `;
    document.getElementById('hc-tc-result').classList.add('visible');
}
