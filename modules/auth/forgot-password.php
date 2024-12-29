<?php
// ... Code PHP giữ nguyên ...
?>

<style>
.user-form-card {
    max-width: 450px;
    margin: 50px auto;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
    background: #fff;
}

.user-form-title {
    color: #333;
    font-size: 24px;
    font-weight: 600;
    text-align: center;
    margin-bottom: 30px;
    padding-bottom: 15px;
    border-bottom: 2px solid #f1f1f1;
}

.form-group {
    margin-bottom: 20px;
}

.form-control {
    height: 45px;
    padding: 10px 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 15px;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
}

.form-button {
    margin-top: 30px;
}

.form-button button {
    width: 100%;
    height: 45px;
    background: #007bff;
    color: #fff;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
}

.form-button button:hover {
    background: #0056b3;
    transform: translateY(-2px);
}

.alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 8px;
}

.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
}

.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}

/* Animation khi load trang */
.user-form-card {
    animation: slideIn 0.5s ease-out;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive */
@media (max-width: 576px) {
    .user-form-card {
        margin: 20px;
        padding: 20px;
    }
    
    .user-form-title {
        font-size: 20px;
    }
}

/* Hiệu ứng loading khi submit */
.form-button button.loading {
    position: relative;
    color: transparent;
}

.form-button button.loading:after {
    content: '';
    position: absolute;
    width: 20px;
    height: 20px;
    top: 50%;
    left: 50%;
    margin: -10px 0 0 -10px;
    border: 3px solid #ffffff;
    border-top-color: transparent;
    border-radius: 50%;
    animation: spin 0.8s linear infinite;
}

@keyframes spin {
    to {
        transform: rotate(360deg);
    }
}
</style>

<div class="user-form-card">
    <!-- Code HTML giữ nguyên -->
</div>

<script>
// Thêm hiệu ứng loading khi submit form
document.querySelector('.user-form').addEventListener('submit', function(e) {
    const button = this.querySelector('button');
    button.classList.add('loading');
});
</script>

<?php
home("foot");
?> 