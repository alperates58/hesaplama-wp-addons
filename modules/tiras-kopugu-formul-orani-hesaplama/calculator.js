function hcTıraşKöpüğüFormülOranıHesapla() {
    const total = parseFloat(document.getElementById('hc-sf-total').value);
    const oilP = parseFloat(document.getElementById('hc-sf-oil').value);
    const alkaliP = parseFloat(document.getElementById('hc-sf-alkali').value);

    if (!total) return;

    const oilG = total * (oilP / 100);
    const alkaliG = total * (alkaliP / 100);
    const waterG = total - oilG - alkaliG;

    document.getElementById('hc-sf-stats').innerHTML = `
        🧴 <strong>Yağ Fazı:</strong> ${oilG.toFixed(1)} g<br>
        🧪 <strong>Alkali Çözeltisi:</strong> ${alkaliG.toFixed(1)} g<br>
        💧 <strong>Su / Gliserin:</strong> ${waterG.toFixed(1)} g<br>
        <p style="font-size:0.85em; color:#666; margin-top:10px;">*Uyarı: Sabunlaşma değerlerini (SAP) kontrol edin. Bu oranlar baz formül içindir.</p>
    `;
    document.getElementById('hc-sf-result').classList.add('visible');
}
