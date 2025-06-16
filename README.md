# 🛠️ Minucia App

Sistema de gestión de piezas para proyectos de fabricación, desarrollado con **Laravel 10**, autenticación basada en Blade, y base de datos SQLite para pruebas locales. Este sistema permite registrar, consultar y reportar piezas por proyecto, bloque y estado de fabricación.

---

## 🚀 Funcionalidades principales

### 🔐 Autenticación
- Login seguro con validación de credenciales (Blade).
- Protección de rutas mediante middleware `auth`.

### 📁 Módulos del sistema

#### 1. **CRUD de Piezas**
- Registro de nombre, peso teórico y real, estado (`Pendiente` o `Fabricado`), bloque, fecha y usuario que la registra.
- Listado, edición y eliminación de piezas.
- Relación con bloques y proyectos.

#### 2. **CRUD de Bloques**
- Administración de bloques asociados a proyectos.

#### 3. **CRUD de Proyectos**
- Gestión de proyectos y visualización de bloques/piezas asociados.

#### 4. **CRUD de Usuarios**
- Gestión de usuarios con roles básicos (administrador, operador, etc.).

#### 5. **Dashboard Principal**
- Acceso central a los módulos del sistema.
- Enlaces a CRUD y reportes.

#### 6. **Reportes**
- 📋 Reporte de piezas pendientes agrupadas por proyecto.
- 📊 Reporte gráfico de piezas pendientes vs fabricadas por proyecto (a implementar con Chart.js u otra librería).

---

## ⚙️ Instalación del proyecto

1. Clona este repositorio:
   ```bash
   git clone https://github.com/tu-usuario/minucia-app.git
   cd minucia-app
