function hcDiceAvgHesapla() {
    const count = parseInt(document.getElementById('hc-da-count').value) || 0;
    const sides = parseInt(document.getElementById('hc-da-sides').value) || 0;

    if (count <= 0 || sides < 2) return;

    // Beklenen değer (tek zar için): (S + 1) / 2
    const singleDiceEV = (sides + 1) / 2;
    const totalEV = count * singleDiceEV;

    document.getElementById('hc-res-da-val').innerText = totalEV.toLocaleString('tr-TR');
    document.getElementById('hc-dice-avg-result').classList.add('visible');
}
