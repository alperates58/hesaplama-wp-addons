function hcKolonyaAlkolOranıHesapla() {
    const totalV = parseFloat(document.getElementById('hc-col-total').value);
    const targetD = parseFloat(document.getElementById('hc-col-target').value);
    const sourceD = parseFloat(document.getElementById('hc-col-source').value);

    if (!totalV || !targetD || !sourceD) return;
    if (targetD > sourceD) {
        alert('Hedef derece kaynak derecesinden büyük olamaz.');
        return;
    }

    // C1 * V1 = C2 * V2
    // sourceD * alcoholV = targetD * totalV
    const alcoholV = (targetD * totalV) / sourceD;
    const waterV = totalV - alcoholV;

    document.getElementById('hc-col-stats').innerHTML = `
        🧪 <strong>Alkol Miktarı:</strong> ${alcoholV.toFixed(1)} mL<br>
        💧 <strong>Su / Esans Miktarı:</strong> ${waterV.toFixed(1)} mL<br>
        <p style="font-size:0.85em; color:#666; margin-top:10px;">*Not: Hacim büzülmesini (kontraksiyon) ihmal eder. Esans miktarını su miktarından düşebilirsiniz.</p>
    `;
    document.getElementById('hc-col-result').classList.add('visible');
}
