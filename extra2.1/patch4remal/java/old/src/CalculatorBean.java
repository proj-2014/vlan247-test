

package calculator;

public class CalculatorBean implements java.io.Serializable {
    private float result;
    public CalculatorBean(){ this.result = 0.0f; }

    public float addAB(float a, float b)
    { this.result = a+b; return result; }
    public float subAB(float a, float b)
    {this.result = a-b; return result; }
    public float mplAB(float a, float b)
    { this.result = a*b; return result;}
    public float divAB(float  a, float b)
    { this.result = a/b; return result;}

    public float getResult(){
        return this.result;
    }
}
