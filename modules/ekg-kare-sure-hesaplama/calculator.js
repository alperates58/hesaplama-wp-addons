function hcEKGKareSüreHesapla() {
    const small = parseFloat(document.getElementById('hc-et-small').value) || 0;
    const large = parseFloat(document.getElementById('hc-et-large').value) || 0;

    // Small square = 0.04s = 40ms
    // Large square = 0.2s = 200ms
    const totalMs = (small * 40) + (large * 200);

    document.getElementById('hc-et-stats').innerHTML = `
        🕒 <strong>Toplam Süre:</strong> ${totalMs} ms (${(totalMs/1000).toFixed(2)} saniye)<br>
        <p style="font-size:0.85em; color:#666; margin-top:10px;">*Standart kağıt hızı (25 mm/sn) için geçerlidir.</p>
    `;
    document.getElementById('hc-et-result').classList.add('visible');
}
