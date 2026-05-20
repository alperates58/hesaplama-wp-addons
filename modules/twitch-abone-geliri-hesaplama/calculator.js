function hcTwitchAboneGeliriHesapla() {
    var t1 = parseFloat(document.getElementById('hc-twa-t1').value) || 0;
    var t2 = parseFloat(document.getElementById('hc-twa-t2').value) || 0;
    var t3 = parseFloat(document.getElementById('hc-twa-t3').value) || 0;
    var prime = parseFloat(document.getElementById('hc-twa-prime').value) || 0;
    var payOrani = parseFloat(document.getElementById('hc-twa-pay').value) / 100;

    if (t1 < 0 || t2 < 0 || t3 < 0 || prime < 0) {
        alert('Abone sayıları negatif olamaz.');
        return;
    }

    var toplamAdet = t1 + t2 + t3 + prime;
    
    // Twitch subscriber points are weighted: T1=1, T2=2, T3=6, Prime=1
    var toplamPuan = t1 + (t2 * 2) + (t3 * 6) + prime;

    var pT1 = 43.90;
    var pT2 = 87.90;
    var pT3 = 219.90;
    var pPrime = 43.90;

    var brutT1 = t1 * pT1;
    var brutT2 = t2 * pT2;
    var brutT3 = t3 * pT3;
    var brutPrime = prime * pPrime;

    var brutToplam = brutT1 + brutT2 + brutT3 + brutPrime;
    var netToplam = brutToplam * payOrani;
    var kesinti = brutToplam - netToplam;
    var yillikNet = netToplam * 12;

    var fmtPara = function(val) {
        return val.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    };

    var fmtSayi = function(val) {
        return val.toLocaleString('tr-TR');
    };

    document.getElementById('hc-twa-res-adet').textContent = fmtSayi(toplamAdet) + ' (' + fmtSayi(toplamPuan) + ' Puan)';
    document.getElementById('hc-twa-res-brut').textContent = fmtPara(brutToplam);
    document.getElementById('hc-twa-res-kesinti').textContent = fmtPara(kesinti);
    document.getElementById('hc-twa-res-net').textContent = fmtPara(netToplam);
    document.getElementById('hc-twa-res-yillik').textContent = fmtPara(yillikNet);

    document.getElementById('hc-twitch-abone-geliri-result').classList.add('visible');
}
