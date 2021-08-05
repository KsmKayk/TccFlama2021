import ICreateAddressDTO from "../dtos/ICreateAddressDTO";
import User_Address from "../infra/typeorm/entities/User_Address";

export default interface IUsersRepository {
  create(data: ICreateAddressDTO): Promise<User_Address>;
}
