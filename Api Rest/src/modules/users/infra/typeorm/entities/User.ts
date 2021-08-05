import {
  Entity,
  Column,
  PrimaryGeneratedColumn,
  CreateDateColumn,
  UpdateDateColumn,
  OneToOne,
  JoinColumn,
} from "typeorm";
import { Exclude } from "class-transformer";
import User_Address from "./User_Address";

@Entity("users")
class User {
  @PrimaryGeneratedColumn("uuid")
  id: string;

  @Column()
  name: string;

  @Column()
  email: string;

  @Column()
  @Exclude()
  password_hash: string;

  @Column()
  gender: string;

  @Column()
  address_id: string;

  @OneToOne(() => User_Address)
  @JoinColumn({ name: "address_id" })
  address: User_Address;

  @Column()
  telephone: string;

  @Column()
  cellphone: string;

  @CreateDateColumn()
  created_at: Date;

  @UpdateDateColumn()
  updated_at: Date;
}

export default User;
