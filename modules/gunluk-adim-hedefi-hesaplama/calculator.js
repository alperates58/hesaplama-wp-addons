function hcStepGoalHesapla() {
    const goal = parseInt(document.getElementById('hc-sg-goal').value);
    
    const resVal = document.getElementById('hc-sg-res-val');
    resVal.innerText = goal.toLocaleString('tr-TR');

    const resDesc = document.getElementById('hc-sg-res-desc');
    const descriptions = {
        5000: "Hareketsizliği kırmak için ilk adım. Haftalık 150 dk orta şiddetli egzersizle destekleyin.",
        8000: "Kronik hastalık riskini azaltmak için ideal bir başlangıç seviyesi.",
        10000: "Altın standart. Kalp sağlığı ve kilo kontrolü için en dengeli hedef.",
        12000: "Kalori açığı yaratmak ve metabolizmayı hızlandırmak için mükemmel.",
        15000: "Yüksek enerji harcaması gerektiren atletik bir yaşam tarzı."
    };
    resDesc.innerText = descriptions[goal];

    document.getElementById('hc-step-goal-result').classList.add('visible');
}
