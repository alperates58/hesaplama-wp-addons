function hcEbob(a, b) { a = Math.abs(a); b = Math.abs(b); while (b) { var t = b; b = a % b; a = t; } return a; }
function hcDenkKesirHesapla() {
    var pay = parseInt(document.getElementById('hc-dkr-pay').value);
    var payda = parseInt(document.getElementById('hc-dkr-payda').value);
    var adet = parseInt(document.getElementById('hc-dkr-carpan').value) || 5;
    var sonuc = document.getElementById('hc-denk-kesir-hesaplama-result');
    if (isNaN(pay) || isNaN(payda)) { alert('Pay ve payda değerlerini girin.'); return; }
    if (payda === 0) { alert('Payda sıfır olamaz.'); return; }
    var ebob = hcEbob(pay, payda);
    var sadePay = pay / ebob, sadePayda = payda / ebob;
    var denkler = [];
    for (var k = 1; k <= adet; k++) denkler.push((sadePay * k) + ' / ' + (sadePayda * k));
    sonuc.innerHTML =
        '<p><strong>Özgün Kesir:</strong> ' + pay + ' / ' + payda + '</p>' +
        '<p><strong>Sadeleştirilmiş:</strong> <span class="hc-result-value">' + sadePay + ' / ' + sadePayda + '</span></p>' +
        '<p><strong>Denk Kesirler:</strong></p>' +
        '<p>' + denkler.join(' &nbsp;=&nbsp; ') + '</p>';
    sonuc.classList.add('visible');
}
