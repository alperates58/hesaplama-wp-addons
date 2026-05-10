function hcPM25MaruziyetiHesapla() {
    const level = parseFloat(document.getElementById('hc-pm-level').value);
    const hours = parseFloat(document.getElementById('hc-pm-time').value);

    if (!level) return;

    // PM2.5 Sigara Eşdeğeri: Bazı çalışmalar 22 µg/m³ PM2.5 = 1 sigara/gün der.
    const cigaretteEquiv = (level / 22) * (hours / 24);
    
    let risk = "Düşük";
    let color = "#27ae60";

    if (level > 150) { risk = "Tehlikeli"; color = "#c0392b"; }
    else if (level > 55) { risk = "Çok Sağlıksız"; color = "#8e44ad"; }
    else if (level > 35) { risk = "Sağlıksız"; color = "#e67e22"; }
    else if (level > 12) { risk = "Orta"; color = "#f1c40f"; }

    document.getElementById('hc-pm-stats').innerHTML = `
        ⚖️ <strong>Risk Durumu:</strong> <span style="color:${color}">${risk}</span><br>
        🚬 <strong>Günlük Sigara Eşdeğeri:</strong> ${cigaretteEquiv.toFixed(2)} adet<br>
        <p style="font-size:0.85em; color:#666; margin-top:10px;">*Sigara eşdeğeri, havadaki partikül miktarının akciğer üzerindeki etkisini temsil eden sembolik bir hesaplamadır.</p>
    `;
    document.getElementById('hc-pm-result').classList.add('visible');
}
