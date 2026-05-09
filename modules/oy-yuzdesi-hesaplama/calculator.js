function hcVotePercentHesapla() {
    const target = parseFloat(document.getElementById('hc-vote-target').value) || 0;
    const total = parseFloat(document.getElementById('hc-vote-total').value) || 0;

    if (total <= 0) return;

    const percent = (target / total) * 100;

    document.getElementById('hc-res-vote-val').innerText = '%' + percent.toFixed(2).toLocaleString('tr-TR');
    document.getElementById('hc-res-vote-bar').style.width = Math.min(100, percent) + '%';
    
    document.getElementById('hc-vote-percent-result').classList.add('visible');
}
