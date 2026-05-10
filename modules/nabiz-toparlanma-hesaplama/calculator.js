function hcHrRecoveryHesapla() {
    const peak = parseInt(document.getElementById('hc-rec-peak').value);
    const after = parseInt(document.getElementById('hc-rec-after').value);

    if (!peak || !after) {
        alert('Lütfen nabız değerlerini giriniz.');
        return;
    }

    const recovery = peak - after;
    
    const resVal = document.getElementById('hc-rec-res-val');
    resVal.innerText = recovery;

    const resDesc = document.getElementById('hc-rec-res-desc');
    if (recovery < 12) {
        resDesc.innerText = "Zayıf: Toparlanma hızı düşük, kondisyon çalışması önerilir.";
        resDesc.style.color = "#e74c3c";
    } else if (recovery <= 20) {
        resDesc.innerText = "Normal: Standart bir toparlanma hızı.";
        resDesc.style.color = "#f1c40f";
    } else if (recovery <= 30) {
        resDesc.innerText = "İyi: Kalbiniz egzersize iyi adapte oluyor.";
        resDesc.style.color = "#27ae60";
    } else {
        resDesc.innerText = "Mükemmel: Üst düzey kardiyovasküler kondisyon!";
        resDesc.style.color = "#2980b9";
    }

    document.getElementById('hc-hr-recovery-result').classList.add('visible');
}
