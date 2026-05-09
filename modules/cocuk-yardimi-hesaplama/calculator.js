function hcCocukHesapla() {
    const small = parseInt(document.getElementById('hc-cy-count-small').value) || 0;
    const big = parseInt(document.getElementById('hc-cy-count-big').value) || 0;

    const rateSmall = 693.93;
    const rateBig = 346.96;

    const total = (small * rateSmall) + (big * rateBig);

    document.getElementById('hc-cy-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-cocuk-result').classList.add('visible');
}
