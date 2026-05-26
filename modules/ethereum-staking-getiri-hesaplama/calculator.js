function hcEthereumStakingGetiriHesapla() {
    var miktar = parseFloat(document.getElementById('hc-esg-miktar').value) || 0;
    var apy = parseFloat(document.getElementById('hc-esg-oran').value) || 0;

    if (miktar <= 0 || apy <= 0) {
        alert('Lütfen geçerli ETH miktarı ve APY giriniz.');
        return;
    }

    var yillikKazanc = miktar * (apy / 100);
    var gunlukKazanc = yillikKazanc / 365;
    var haftalikKazanc = yillikKazanc / 52;
    var aylikKazanc = yillikKazanc / 12;

    document.getElementById('hc-esg-res-gun').innerText = gunlukKazanc.toFixed(6) + ' ETH';
    document.getElementById('hc-esg-res-hafta').innerText = haftalikKazanc.toFixed(6) + ' ETH';
    document.getElementById('hc-esg-res-ay').innerText = aylikKazanc.toFixed(6) + ' ETH';
    document.getElementById('hc-esg-res-yil').innerText = yillikKazanc.toFixed(6) + ' ETH';

    document.getElementById('hc-esg-result').classList.add('visible');
}