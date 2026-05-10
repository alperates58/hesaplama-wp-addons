function hcVoteRateHesapla() {
    const votes = parseFloat(document.getElementById('hc-vr-votes').value);
    const total = parseFloat(document.getElementById('hc-vr-total').value);

    if (isNaN(votes) || isNaN(total) || total <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    if (votes > total) {
        alert('Alınan oy toplam oydan fazla olamaz.');
        return;
    }

    const rate = (votes / total) * 100;

    document.getElementById('hc-vr-res-val').innerText = `% ${rate.toLocaleString('tr-TR', { maximumFractionDigits: 2 })}`;
    document.getElementById('hc-vote-rate-result').classList.add('visible');
}
